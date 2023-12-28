from flask import Flask, request, render_template
from jinja2 import Environment
import pickle
import bz2file as bz2
import requests
import pandas as pd
from patsy import dmatrices
import json
import urllib.request
import logging
from flask_mail import Mail, Message


app = Flask(__name__)

# Configure Flask-Mail settings
app.config['MAIL_SERVER'] = 'smtp.gmail.com'
app.config['MAIL_PORT'] = 587
app.config['MAIL_USE_TLS'] = True
app.config['MAIL_USERNAME'] = 'pms.write@gmail.com'
app.config['MAIL_PASSWORD'] = 'iwhchxznwifqddkv'
app.config['MAIL_DEFAULT_SENDER'] = 'pms.write@gmail.com'

# Configure the OAuth instances
mail = Mail(app)



movies = pickle.load(open('/home/pranik/mysite/model/movies_list.pkl', 'rb'))
similarity = pickle.load(bz2.BZ2File('/home/pranik/mysite/model/similarity.pkl', 'rb'))

# Retrieve details of a movie based on the input movie ID
def fetch_movie_details(movie_id):
    # Build URL for TMDB API request
    url = f'https://api.themoviedb.org/3/movie/{movie_id}'
    url += '?api_key=b9093ccf3b2dedc32dd29d4b0b0bd00c'
    url += '&language=en-US&append_to_response=videos,credits'

    # Send request to TMDB API and extract JSON data
    data = requests.get(url).json()

    # Extract movie details from JSON data
    poster_path = data.get('poster_path')
    trailer_key = None
    if 'videos' in data and 'results' in data['videos'] and len(data['videos']['results']) > 0:
        trailer_key = 'https://www.youtube.com/embed/' + data['videos']['results'][0]['key']
    if poster_path is not None:
        full_path = "https://image.tmdb.org/t/p/w500/" + poster_path

        title = data['title']
        genres = [genre['name'] for genre in data['genres']]
        imdb_rating = round(data['vote_average'], 1)
        release_year = data['release_date'][:4]
        runtime = data['runtime']
        hours = runtime // 60
        minutes = runtime % 60
        runtime_str = f"{hours} hr {minutes} min"
        credits = data['credits']
        overview = data['overview'][:295] + '...' if len(data['overview']) > 298 else data['overview']
        director = None
        cast = []
        if 'crew' in credits:
            for crew_member in credits['crew']:
                if crew_member['job'] == 'Director':
                    director = crew_member['name']
                    break
        if 'cast' in credits:
            for cast_member in credits['cast'][:2]:
                cast.append(cast_member['name'])
        cast = ', '.join(cast)
        genres = ', '.join(genres)
    # Return movie details as a tuple
    return title, full_path, trailer_key, genres, imdb_rating, release_year, runtime_str, director, cast, overview

# Recommended movies based on similarity scores
def rcmd(movie):
    if movie not in movies['movie_title'].unique():
        return None
    else:
        movie_index = movies[movies['movie_title'] == movie].index[0]
        movie_list = list(enumerate(similarity[movie_index]))
        movie_list = sorted(movie_list, key=lambda x: x[1], reverse=True)[0:9]
        movie_list = movie_list[1:]
        recommended_movies = []
        for i in range(len(movie_list)):
            idx = movie_list[i][0]
            recommended_movies.append(movies.iloc[idx]['movie_title'])
        return recommended_movies

# Names and profile image of top 8 cast members
def fetch_cast(movie_id):
    api_key = "b9093ccf3b2dedc32dd29d4b0b0bd00c"
    url = f"https://api.themoviedb.org/3/movie/{movie_id}/credits?api_key={api_key}&language=en-US"
    response = requests.get(url)
    data = response.json()
    # Extract the first 8 actors' names and profile paths
    if 'cast' in data:
        cast_ac = data['cast'][:8]
        actors = []
        for c in cast_ac:
            name = c['name']
            profile_path = f"https://image.tmdb.org/t/p/w500/{c['profile_path']}" if c['profile_path'] else None
            actors.append({'name': name, 'profile_path': profile_path})
        return actors
    # If movie not found, return None
    else:
        return []


# Flask route for the homepage
@app.route("/", methods=["GET"])
def home():
    return render_template("index.html")

# Define a route for the home page
@app.route('/about')
def about():
    return render_template('about.html')

# Define a route for the contact page
@app.route('/contact')
def contact():
    return render_template('contact.html')

# Flask route for searching a movie from desktop search bar
@app.route("/search-movie", methods=['POST','GET'])
def search_movie():
    movie_title = request.form.get("movie")
    movie_title = movie_title.lower()
    for _, movie_info in movies.iterrows():
        if movie_info["movie_title"].lower() == movie_title:
            print("Movie title: ",movie_info["movie_title"])
            # Fetch movie details from the TMDB API
            title, full_path, trailer_key, genres, imdb_rating, release_year, runtime_str, director, cast, overview = fetch_movie_details(movie_info['movie_id'])

            # Top 8 Actors
            cast_ac = fetch_cast(movie_info['movie_id'])

            # Recommended movies details
            recommended_movies = rcmd(movie_info["movie_title"])
            movie_details = []
            if recommended_movies:
                for movie in recommended_movies:
                    try:
                        movie_id_r = movies[movies['movie_title'] == movie]['movie_id'].values[0]
                        title_r, poster_r, trailer_r, genres_r, rating_r, year_r, runtime_r, director_r, cast_r, overview_r = fetch_movie_details(movie_id_r)

                        movie_details.append({'poster_r':poster_r,'title_r': title_r, 'genres_r': genres_r, 'rating_r': rating_r, 'year': year_r, 'runtime_r': runtime_r,'movie_id_r': movie_id_r})
                    except:
                        continue

            # Render the movie.html template with movie details
            return render_template('rec.html', title=title, full_path=full_path, trailer_key=trailer_key, genres=genres, imdb_rating=imdb_rating,
                                   release_year=release_year, runtime_str=runtime_str, director=director, cast=cast, overview=overview, actors=cast_ac, movie_details=movie_details)

    # If movie not found, show error message as push notification
    error = 'Sorry! Movie not found in our database. Please check spelling and try again.'
    return render_template("index.html",not_found = error)

# Flask route for searching a movie from phone search bar
@app.route("/search-movies", methods=['POST','GET'])
def search_movie_phone():
    movie_title = request.form.get("movie")
    movie_title = movie_title.lower()
    for _, movie_info in movies.iterrows():
        if movie_info["movie_title"].lower() == movie_title:
            print("Movie title: ",movie_info["movie_title"])

            # Fetch movie details from the TMDB API
            title, full_path, trailer_key, genres, imdb_rating, release_year, runtime_str, director, cast, overview = fetch_movie_details(movie_info['movie_id'])

            # Top 8 Actors
            cast_ac = fetch_cast(movie_info['movie_id'])

            # Recommended movies details
            recommended_movies = rcmd(movie_info["movie_title"])
            movie_details = []
            if recommended_movies:
                for movie in recommended_movies:
                    try:
                        movie_id_r = movies[movies['movie_title'] == movie]['movie_id'].values[0]
                        title_r, poster_r, trailer_r, genres_r, rating_r, year_r, runtime_r, director_r, cast_r, overview_r = fetch_movie_details(movie_id_r)

                        movie_details.append({'poster_r':poster_r,'title_r': title_r, 'genres_r': genres_r, 'rating_r': rating_r, 'year_r': year_r, 'runtime_r': runtime_r,'movie_id_r': movie_id_r})
                    except:
                        continue

            # Render the movie.html template with movie details
            return render_template('rec.html', title=title, full_path=full_path, trailer_key=trailer_key, genres=genres, imdb_rating=imdb_rating,
                                   release_year=release_year, runtime_str=runtime_str, director=director, cast=cast, overview=overview, actors=cast_ac, movie_details=movie_details)

    # If movie not found, show error message as push notification
    error = 'Sorry! Movie not found in our database. Please check spelling and try again.'
    return render_template("index.html",not_found=error)

# Define a route for the suggestions API
@app.route('/suggestions/<string:query>')
def suggestions(query):
    # Get the list of suggestions for the query
    suggestions = get_suggestions(query)[:5]
    return {'suggestions': suggestions}


def get_suggestions(query):
    # Convert the query to lowercase and remove any leading/trailing whitespace
    query = query.lower().strip()
    # Get the list of movie titles that match the query
    matches = movies[movies['movie_title'].str.lower().str.contains(query)]
    # Print out the query and the list of matches for debugging purposes
    print(f'Query: {query}')
    print(f'Matches: {matches.to_dict(orient="records")}')
    # Return the top 5 matches, including the movie ID
    suggestions = []
    for i, row in matches.head(5).iterrows():
        suggestion = {
            'id': row['movie_id'],
            'title': row['movie_title']
        }
        suggestions.append(suggestion)
    return suggestions
    suggestions = get_suggestions(query)

# Define a route for the search movie by query
@app.route('/search')
def search_movies():
    query = request.args.get('query')
    movie_id = request.args.get('id')
    # If a movie ID is provided, return its details
    if movie_id:
        # Fetch movie details from the TMDB API
        title, full_path, trailer_key, genres, imdb_rating, release_year, runtime_str, director, cast, overview = fetch_movie_details(int(movie_id))
        print(title,full_path)

        # Top 8 Actors
        cast_ac = fetch_cast(int(movie_id))

        # Recommended movies details
        recommended_movies = rcmd(query)
        movie_details = []
        if recommended_movies:
            for movie in recommended_movies:
                try:
                    movie_id_r = movies[movies['movie_title'] == movie]['movie_id'].values[0]
                    title_r, poster_r, trailer_r, genres_r, rating_r, year_r, runtime_r, director_r, cast_r, overview_r = fetch_movie_details(movie_id_r)

                    movie_details.append({'poster_r':poster_r,'title_r': title_r, 'genres_r': genres_r, 'rating_r': rating_r, 'year_r': year_r, 'runtime_r': runtime_r, 'movie_id_r': movie_id_r})
                except:
                    continue


         # Render the movie.html template with movie details
        return render_template('rec.html', title=title, full_path=full_path, trailer_key=trailer_key, genres=genres, imdb_rating=imdb_rating,
                             release_year=release_year, runtime_str=runtime_str, director=director, cast=cast, overview=overview, actors=cast_ac, movie_details=movie_details)

# Top Movies Category
@app.route('/thriller-movies')
def thriller():
    films = [1041054,19703,1029827,491629,768362,287767,267192,70160,1985,191726,86004,165904]
    movie_details = []
    for movie_id in films:
        # Fetch movie details from the TMDB API
        title_r, poster_r, trailer_r, genres_r, rating_r, year_r, runtime_r, director_r, cast_r, overview_r = fetch_movie_details(movie_id)
        movie_details.append({'poster_r':poster_r,'title_r': title_r, 'genres_r': genres_r, 'rating_r': rating_r, 'year_r': year_r, 'runtime_r': runtime_r,'movie_id_r': movie_id})
    return render_template("thriller.html",movie_details=movie_details)


@app.route('/action-movies')
def action():
    films = [554600,579974,558,299534,337876,465642,864692,68721,127585,9799,603692,447365]
    movie_details = []
    for movie_id in films:
        title_r, poster_r, trailer_r, genres_r, rating_r, year_r, runtime_r, director_r, cast_r, overview_r = fetch_movie_details(movie_id)
        movie_details.append({'poster_r':poster_r,'title_r': title_r, 'genres_r': genres_r, 'rating_r': rating_r, 'year_r': year_r, 'runtime_r': runtime_r,'movie_id_r': movie_id})
    return render_template("action.html",movie_details=movie_details)

@app.route('/comedy-movies')
def comedy():
    films = [472123,25867,24603,20453,138122,393441,454776,20359,391779,19625,34144,336211]
    movie_details = []
    for movie_id in films:
        title_r, poster_r, trailer_r, genres_r, rating_r, year_r, runtime_r, director_r, cast_r, overview_r = fetch_movie_details(movie_id)
        movie_details.append({'poster_r':poster_r,'title_r': title_r, 'genres_r': genres_r, 'rating_r': rating_r, 'year_r': year_r, 'runtime_r': runtime_r,'movie_id_r': movie_id})
    return render_template("comedy.html",movie_details=movie_details)

@app.route('/romance-movies')
def romance():
    films = [381418,391629,50620,894758,376047,818648,678835,661043,339419,669696,222935,216015]
    movie_details = []
    for movie_id in films:
        title_r, poster_r, trailer_r, genres_r, rating_r, year_r, runtime_r, director_r, cast_r, overview_r = fetch_movie_details(movie_id)
        movie_details.append({'poster_r':poster_r,'title_r': title_r, 'genres_r': genres_r, 'rating_r': rating_r, 'year_r': year_r, 'runtime_r': runtime_r,'movie_id_r': movie_id})
    return render_template("romance.html",movie_details=movie_details)

@app.route('/drama-movies')
def drama():
    films = [672143,480810,360814,413543,336203,549184,374173,314365,700391,11518,352173,370870]
    movie_details = []
    for movie_id in films:
        title_r, poster_r, trailer_r, genres_r, rating_r, year_r, runtime_r, director_r, cast_r, overview_r = fetch_movie_details(movie_id)
        movie_details.append({'poster_r':poster_r,'title_r': title_r, 'genres_r': genres_r, 'rating_r': rating_r, 'year_r': year_r, 'runtime_r': runtime_r,'movie_id_r': movie_id})
    return render_template("drama.html",movie_details=movie_details)

@app.route('/horror-movies')
def horror():
    films = [310131,256907,335796,830788,259693,241258,83899,24116,146301,158519,242441,55779]
    movie_details = []
    for movie_id in films:
        # Fetch movie details from the TMDB API
        title_r, poster_r, trailer_r, genres_r, rating_r, year_r, runtime_r, director_r, cast_r, overview_r = fetch_movie_details(movie_id)
        movie_details.append({'poster_r':poster_r,'title_r': title_r, 'genres_r': genres_r, 'rating_r': rating_r, 'year_r': year_r, 'runtime_r': runtime_r,'movie_id_r': movie_id})
    return render_template("horror.html",movie_details=movie_details)


def get_matching_movies(query):
    # Convert the query to lowercase and remove any leading/trailing whitespace
    query = query.lower().strip()
    # Get the list of movies that match the query
    matching_movies = movies[movies['movie_title'].str.lower().str.contains(query)]
    # Sort the movies by title
    matching_movies = matching_movies.sort_values('movie_title')
    # Return the list of matching movies
    return matching_movies.to_dict(orient='records')



@app.route('/contact-form', methods=['POST'])
def contact_form():
    if request.method == 'POST':
        name = request.form.get('name')
        email = request.form.get('email')
        message = request.form.get('message')

        # Create the email message
        subject = 'New Contact Form Submission'
        body = f"Name: {name}\nEmail: {email}\nMessage: {message}"
        recipients = ['pranikmovies@gmail.com']

        # Send the email
        msg = Message(subject=subject, body=body, recipients=recipients)
        mail.send(msg)

        return 'Message sent successfully'
    return render_template('contact.html')


if __name__ == '__main__':
    app.run()
