import os
import random
import re
from kivy.app import App
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.label import Label
from kivy.uix.scrollview import ScrollView
from kivy.uix.textinput import TextInput
from kivy.uix.button import Button
from kivy.core.audio import SoundLoader
from textblob import TextBlob
from kivy.core.window import Window
from kivy.uix.image import Image
from kivy.graphics import Color, Rectangle
from kivy.uix.widget import Widget

sound = ""
mood = ""


class ChatBotApp(App):
    def build(self):
        # Change the window size
        Window.size = (400, 240)

        # Create the main layout
        layout = BoxLayout(orientation='vertical', padding=10, spacing=10)

        # Set the background image
        with layout.canvas.before:
            bg_color = Color(1, 1, 1, 1)
            bg_image = Rectangle(source='C:/image/image.jpeg', pos=layout.pos, size=layout.size,
                                 pos_hint={'center_x': 0.5, 'center_y': 0.5})

            # Bind the background image update to the layout's pos and size properties
            layout.bind(pos=self._update_background_image, size=self._update_background_image)

        # Create a scroll view for the chat history
        self.scroll_view = ScrollView()

        # Create a layout for the chat history
        self.chat_layout = BoxLayout(orientation='vertical', size_hint=(1, None), spacing=10, padding=10)
        self.chat_layout.bind(minimum_height=self.chat_layout.setter('height'))

        # Add the chat layout to the scroll view
        self.scroll_view.add_widget(self.chat_layout)

        # Add the scroll view to the main layout
        layout.add_widget(self.scroll_view)

        # Create a BoxLayout for the input text box and its border
        input_layout = BoxLayout(orientation='vertical', size_hint=(1, 0.15), spacing=5)

        # Create a text input for user messages
        self.text_input = TextInput(multiline=False,
                                    size_hint=(1, 0.15),
                                    font_size=14,
                                    background_color=(0, 0, 0, 0),
                                    foreground_color=(0, 0, 0, 1),
                                    hint_text='Type Something: ')
        self.text_input.bind(on_text_validate=self.send_message)  # Bind the enter key press event

        layout.add_widget(self.text_input)

        # Create a label for displaying the song name
        self.song_name_label = Label(text='LISTENING TO: ',
                                     pos_hint={'x': 0, 'y': 1},
                                     size_hint=(0.25, 0.1),
                                     font_size=12,
                                     color=(0, 0, 0, 1))  # Set bright black text color
        layout.add_widget(self.song_name_label)

        # Create buttons for sending messages and controlling music
        button_layout = BoxLayout(size_hint=(1, 0.1), spacing=10)

        send_button = Button(text='SEND',
                             background_color=(0, 0, 0, 1),
                             size_hint=(1, 0.25),
                             font_size=15,
                             color=(1, 1, 1, 1))  # Set bright white text color
        send_button.bind(on_press=self.send_message)
        button_layout.add_widget(send_button)

        self.play_button = Button(text='STOP',
                                  background_color=(0, 0, 0, 1),
                                  size_hint=(1, 0.25),
                                  font_size=15,
                                  color=(1, 1, 1, 1))  # Set bright white text color
        self.play_button.bind(on_press=self.play_music)
        self.play_button.disabled = False  # Initially disable the pause button
        button_layout.add_widget(self.play_button)

        layout.add_widget(button_layout)

        pause_button = Button(text='PAUSE',
                              background_color=(0, 0, 0, 1),
                              size_hint=(1, 0.25),
                              font_size=15,
                              color=(1, 1, 1, 1))  # Set bright white text color
        pause_button.bind(on_press=self.pause_music)
        button_layout.add_widget(pause_button)

        # Create the resume button
        self.resume_button = Button(text='Resume', disabled=True)

        resume_button = Button(text='SHUFFLE',
                               background_color=(0, 0, 0, 1),
                               size_hint=(1, 0.25),
                               font_size=15,
                               color=(1, 1, 1, 1))  # Set bright white text color
        resume_button.bind(on_press=self.resume_music)
        button_layout.add_widget(resume_button)

        # Create a label for displaying the mood analysis result
        self.mood_label = Label(text='YOU ARE CURRENTLY FEELING:',
                                size_hint=(1, 0.25),
                                font_size=21,
                                color=(0, 0, 0, 1))  # Set bright black text color
        layout.add_widget(self.mood_label)

        # Add the initial message from the chatbot
        self.update_chat("Hello, \n How can I assist you today?", 'MoodTunes')

        self.first_message_sent = False

        return layout

    def _update_background_image(self, instance, value):
        # Clear the canvas before updating the background image
        instance.canvas.before.clear()

        # Set the background image
        with instance.canvas.before:
            bg_image = Rectangle(source='C:/chatbotimages/30.jpg', pos=instance.pos, size=instance.size)

    def send_message(self, instance):
        global sound
        global mood

        user_message = self.text_input.text

        # Remove special characters from the user's message
        user_message = re.sub('[^A-Za-z0-9\s]+', '', user_message)

        # If it's the first user message, don't trigger the music yet
        if not self.first_message_sent:
            self.first_message_sent = True
            bot_response = self.generate_response(user_message)
            self.update_chat(user_message, 'User')
            self.update_chat(bot_response, 'MoodTunes')
            self.text_input.text = ''
            self.text_input.hint_text = 'Type Something: '
            return
        else:
            # Process the user's message and generate a response
            bot_response = self.generate_response(user_message)
            # Update the chat label with the user's message and the bot's response
            self.update_chat(user_message, 'User')
            self.update_chat(bot_response, 'MoodTunes')

            # Perform sentiment analysis on the user's message
            sentiment = self.analyze_sentiment(user_message)
            # Determine the mood based on sentiment
            mood = self.determine_mood(sentiment)

        # Play a random song based on the mood
        if mood == 'Positive':
            # Check if a song is already playing
            if sound and sound.state == 'play':
                sound.stop()

            self.mood_label.text = f'YOU ARE CURRENTLY FEELING: HAPPY!'
            self.play_random_song_from_folder("happy")

        elif mood == 'Negative':
            # Check if a song is already playing
            if sound and sound.state == 'play':
                sound.stop()

            self.mood_label.text = f'YOU ARE CURRENTLY FEELING: SAD!'
            self.play_random_song_from_folder("sad")

        elif mood == 'Neutral':
            if sound and sound.state == 'play':
                sound.stop()

            self.mood_label.text = "CURRENTLY YOUR MOOD IS NEUTRAL!"
            self.play_random_song_from_folder("neutral")

        elif mood == 'Punjabi':
            if sound and sound.state == 'play':
                sound.stop()

            self.mood_label.text = "CURRENTLY YOUR MOOD IS PUNJABI!"
            self.play_random_song_from_folder("Punjabi")


        # Clear the text input
        self.text_input.text = ''

        # Show the hint text again
        self.text_input.hint_text = 'Type Something: '

    def generate_response(self, message):
        lowercase_message = message.lower()

        if lowercase_message in ['hello', 'hi', 'hey', 'hii', 'hiii', 'hiiiii', 'hi there']:
            responses = ["Hi there!", "Hello!", "Hey!", "What's up!"]
            return random.choice(responses)
        elif lowercase_message in ['how are you', 'how are you doing', 'how are you today']:
            responses = ["I'm doing well, thank you!\nHow are you?", "I'm great, thanks for asking!\nHow about you?",
                         "I'm feeling good today!\nHow about yourself?"]
            return random.choice(responses)
        elif lowercase_message in ["play"]:
            responses = ["okk"]
            return random.choice(responses)
        elif lowercase_message in ['fine', 'Fine', 'Good']:
            responses = ["That's great.\nTo hear"]
            return random.choice(responses)
        elif lowercase_message in ['recommend a song','recommend me a song', 'suggest a song', 'give me a song recommendation',
                                   'play a song for me', 'play a song']:
            responses = ["Sure! I recommend listening\n to a song based on your mood.",
                         "Sure! would you like\n to share your emotions?"
                         "Of course! Could you tell me\n how you are feeling so that\n I can find the perfect song for you?"]
            return random.choice(responses)
        elif lowercase_message in ['what is your name', 'your name', 'whats your name', 'can you tell me your name']:
            responses = ["My name is Chatbot. How can I assist you?", "I'm Chatbot, nice to meet you!"]
            return random.choice(responses)
        elif lowercase_message in ['how does your chatbot work', 'how do you work', 'how can you work',
                                   'how can your chatbot work']:
            responses = [
                "I use natural language\nprocessing algorithms to\nanalyze your messages \nand generate responses.",
                "I'm powered by artificial\nintelligence and machine\nlearning techniques."]
            return random.choice(responses)
        elif lowercase_message in ['thank you', 'thanks', 'thank you so much']:
            responses = ["You're welcome!", "No problem!", "Happy to help!"]
            return random.choice(responses)
        elif lowercase_message.startswith('tell me a joke'):
            responses = ["Why don't scientists trust atoms?\nBecause they make up everything!",
                         "Why did the scarecrow win an award?\nBecause he was outstanding in his field!"]
            return random.choice(responses)
        elif re.search(r'\b(my name is|I am|I\'m) \w+\b', lowercase_message):
            # Extract the name from the user's message
            name = re.search(r'\b(my name is|I am|I\'m) (\w+)\b', lowercase_message).group(2)
            responses = [f"Nice to meet you, {name}!", f"Hi, {name}! How can I assist you?"]
            return random.choice(responses)
        elif lowercase_message in ["i'm fine", "im doing great", "im feeling great today", "great", "happy",
                                   "im feeling happy", "im feeling happy today", "im happy"]:
            responses = ["Glad to hear that!", "That's great!", "Good to know!"]
            return random.choice(responses)
        elif lowercase_message in ["i'm great", "im great"]:
            responses = ["Awesome!", "That's fantastic!", "Great to hear!"]
            return random.choice(responses)
        elif lowercase_message in ["i'm happy", "im happy"]:
            responses = ["I'm happy for you!", "That's wonderful!", "Glad to hear you're happy!"]
            return random.choice(responses)
        elif lowercase_message in ["i'm angry", "im feeling angry", "angry"]:
            responses = ["Take a deep breath and try to calm down.",
                         "Anger is a normal emotion, but it's important to manage it in a healthy way.",
                         "Is there something specific that's making you angry?"]
            return random.choice(responses)
        elif lowercase_message in ["i'm sad", "im feeling sad", "sad"]:
            responses = ["I'm sorry to hear that you're feeling sad.",
                         "It's important to acknowledge your emotions and give yourself time to heal.",
                         "Do you want to talk about what's making you feel sad?"]
            return random.choice(responses)
        elif lowercase_message in ["i'm bored", "im feeling bored", "bored"]:
            responses = ["Boredom can be an opportunity for creativity or self-reflection.",
                         "Is there something you enjoy doing that could help pass the time?",
                         "Let's find something interesting for you to do!"]
            return random.choice(responses)
        elif lowercase_message in ["i'm scared", "im feeling scared", "scared"]:
            responses = ["It's natural to feel scared sometimes.",
                         "Try to identify what's causing your fear and think of ways to address it.",
                         "Remember, you're not alone. Reach out to someone you trust for support."]
            return random.choice(responses)
        elif lowercase_message in ["i'm ashamed", "im feeling ashamed", "ashamed"]:
            responses = ["Feeling ashamed can be tough.",
                         "Remember that everyone makes mistakes and it's an opportunity for growth.",
                         "Is there something specific that's causing your shame?"]
            return random.choice(responses)
        elif lowercase_message in ["i'm disgusted", "im feeling disgusted", "disgusted"]:
            responses = ["Disgust is a strong emotion.",
                         "Take a moment to reflect on what's causing your disgust and consider how to address it.",
                         "Is there something specific that's making you feel disgusted?"]
            return random.choice(responses)
        elif lowercase_message in ["i'm depressed", "im feeling depressed", "depressed"]:
            responses = ["I'm really sorry to hear that you're feeling depressed.",
                         "It's important to seek support from loved ones or a professional.",
                         "Remember that there is hope and help available to you."]
            return random.choice(responses)
        elif lowercase_message in ["i'm satisfied", "im feeling satisfied", "satisfied"]:
            responses = ["That's great to hear!", "Feeling satisfied is a wonderful emotion.",
                         "Celebrate your achievements and keep up the good work!"]
            return random.choice(responses)
        elif lowercase_message in ["i'm proud", "im feeling proud", "proud"]:
            responses = ["You should be proud of yourself!", "It's wonderful to feel a sense of pride.",
                         "Keep up the good work and continue to achieve great things!"]
            return random.choice(responses)
        elif lowercase_message in ["i'm envious", "im feeling envious", "envious"]:
            responses = ["Envy can be a challenging emotion.",
                         "Try to focus on your own strengths and accomplishments.",
                         "Remember, everyone's journey is unique."]
            return random.choice(responses)
        elif lowercase_message in ["i'm in love", "im feeling in love", "in love"]:
            responses = ["Love is a beautiful emotion.",
                         "Cherish the feeling and express your love to those who are important to you.",
                         "Wishing you a lifetime of love and happiness!"]
            return random.choice(responses)
        elif lowercase_message in ["i'm embarrassed", "im feeling embarrassed", "embarrassed"]:
            responses = ["We all feel embarrassed from time to time.", "Remember that it's a common human experience.",
                         "Don't be too hard on yourself and try to find humor in the situation."]
            return random.choice(responses)
        elif lowercase_message in ["i'm disappointed", "im feeling disappointed", "disappointed"]:
            responses = ["I'm sorry to hear that you're feeling disappointed.",
                         "Disappointment can be tough, but it's an opportunity to learn and grow.",
                         "Take some time for self-care and think about how you can move forward."]
            return random.choice(responses)
        elif lowercase_message in ["i'm feeling punjabi", "punjabi mood", "punjabi"]:
            responses = ["That's great to hear! Let's play some Punjabi music.",
                         "Punjabi music is awesome! Let's get into that groove!"]
            return random.choice(responses)
        elif lowercase_message in ["i'm confused", "im feeling confused", "confused"]:
            responses = ["Confusion is a natural part of the learning process.",
                         "Take a step back, gather information, and ask questions to gain clarity.",
                         "Don't hesitate to reach out for help or guidance."]
            return random.choice(responses)
        elif lowercase_message in ["i'm guilty", "im feeling guilty", "guilty"]:
            responses = ["Feeling guilty can be a sign that you value your actions and their impact on others.",
                         "Take responsibility for your actions and consider how to make amends if necessary.",
                         "Remember, we all make mistakes and it's important to learn from them."]
            return random.choice(responses)
        elif lowercase_message in ["i'm lonely", "im feeling lonely", "lonely","i am lonely","i am feeling lonely"]:
            responses = ["I'm sorry to hear that you're feeling lonely.",
                         "It's important to reach out to others and seek connection.",
                         "You're not alone, and there are people who care about you."]
            return random.choice(responses)
        elif lowercase_message in ["i'm surprised", "im feeling surprised", "surprised"]:
            responses = ["Surprise can be a delightful emotion!",
                         "Enjoy the unexpected moment and embrace the element of surprise.",
                         "Life is full of surprises, and they can bring joy and excitement."]
            return random.choice(responses)
        elif lowercase_message in ["i'm contempt", "im feeling contempt", "contempt"]:
            responses = ["Feeling contempt can be challenging.",
                         "Try to understand the underlying reasons for your contempt and find constructive ways to address them.",
                         "It's important to approach situations with empathy and open-mindedness."]
            return random.choice(responses)
        elif lowercase_message in ["i'm admiring", "im feeling admiration", "admiration"]:
            responses = ["Admiration is a positive emotion.",
                         "Appreciate the qualities or achievements of others and express your admiration.",
                         "Celebrate the success and greatness you see in others."]
            return random.choice(responses)
        elif lowercase_message in ["play a happy mood song", "Happy mood song ", "love to hear happy song",
                                   "play a happy song","play happy song"]:
            responses = ["Oh, nice to hear you are happy.",
                         "Happiness is necessary to live a life.Love to hear that."]
            return random.choice(responses)
        elif lowercase_message in ["i'm joyful", "im feeling joyful", "joyful"]:
            responses = ["Joy is a wonderful emotion!",
                         "Embrace the feeling and let it fill your heart with happiness.",
                         "May your joy be contagious and spread to those around you!"]
            return random.choice(responses)
        else:
            responses = ["Sorry,\nI didn't understand that.",
                         "I'm still learning.\nCould you please rephrase your message?"]
            return random.choice(responses)

    def update_chat(self, message, sender):
        # Format the message with the sender's name
        formatted_message = f'{sender}: {message}'

        # Create a label widget for the message
        label = Label(text=formatted_message, size_hint=(1, None), height=30)

        # Create a BoxLayout to hold the label
        message_layout = BoxLayout(orientation='horizontal', size_hint=(1, None), height=30)

        # Set the alignment and color of the label based on the sender
        if sender == 'User':
            label.halign = 'left'  # Align user messages to the left
            label.color = (0, 0, 0, 1)  # Red text color for user messages
            label.font_size = 18

            # Create a spacer widget to push the label to the right side
            spacer = Widget()
            message_layout.add_widget(spacer)
            message_layout.add_widget(label)
        else:
            label.halign = 'right'  # Align chatbot messages to the right
            label.color = (0, 0, 0, 1)  # Green text color for chatbot messages
            label.font_size = 18

            message_layout.add_widget(label)
            # Create a spacer widget to push the label to the left side
            spacer = Widget()
            message_layout.add_widget(spacer)

        # Append the new message layout to the existing chat history
        self.chat_layout.add_widget(message_layout)

        # Scroll to the bottom of the chat history
        self.scroll_view.scroll_to(message_layout)

    def analyze_sentiment(self, text):
        # Create a TextBlob object
        blob = TextBlob(text)

        # Perform sentiment analysis
        sentiment = blob.sentiment.polarity

        return sentiment

    def determine_mood(self, sentiment):
        if sentiment > 0:
            return 'Positive'
        elif sentiment < 0:
            return 'Negative'
        elif sentiment == 'Punjabi':
            return 'Punjabi'
        else:
            return 'Neutral'

    def play_random_song_from_folder(self, folder_name):
        global sound

        try:
            # Get the list of files in the specified folder
            song_folder = os.path.join("C:/music", folder_name)
            song_list = os.listdir(song_folder)

            # Randomly select a file from the list
            if len(song_list) > 0:
                random_file = random.choice(song_list)
                song_path = os.path.join(song_folder, random_file)

                # Load the song
                sound = SoundLoader.load(song_path)

                # Check if the song loaded successfully
                if sound:
                    # Play the song
                    sound.play()
                    self.song_name_label.text = f'LISTENING TO: {random_file}'

                else:
                    print("Error loading the song.")
            else:
                print("No songs found in the specified folder.")
        except UnicodeEncodeError:
            print("Error encoding the file path.")

    def play_music(self, instance):
        global sound

        # Check if a song is already playing
        if sound and sound.state == 'play':
            sound.stop()

            self.play_button.text = 'PLAY'  # Change the text of the play button to "Play"
            self.play_button.background_color = (0, 0, 0, 1)  # Change the background color of the play button

            self.resume_button.disabled = True  # Disable the resume button
        else:
            # Play the music if there is a song loaded and it's not already playing
            if hasattr(self, 'sound') and sound and sound.state != 'play':
                sound.play()
                self.play_button.text = 'STOP'  # Change the text of the play button to "STOP"
                self.play_button.background_color = (0, 0, 0, 1)  # Change the background color of the play button

                self.resume_button.disabled = True  # Disable the resume button

    def on_textinput(self, instance, value):
        # Check if the Enter key was pressed
        if value and value.endswith('\n'):
            # Remove the newline character
            value = value[:-1]

            # Send the message
            self.send_message(instance)

            # Clear the text input
            self.text_input.text = ''

    def on_stop(self):
        global sound

        # Stop the music when the app is closed
        if hasattr(self, 'sound') and sound and sound.state == 'play':
            sound.stop()

    def pause_music(self, instance):
        global sound

        # Pause the music if a song is currently playing
        if sound and sound.state == 'play':
            sound.stop()
            self.play_button.text = 'PLAY'  # Change the text of the play button to "Play"
            self.play_button.background_color = (0, 0, 0, 1)  # Change the background color of the play button
            # instance.disabled = True  # Disable the pause button
            self.resume_button.disabled = False  # Enable the resume button

    def resume_music(self, instance):
        global sound
        global mood

        # Play a random song based on the mood
        if mood == 'Positive':
            # Check if a song is already playing
            if sound and sound.state == 'play':
                sound.stop()

            self.mood_label.text = f'YOU ARE CURRENTLY FEELING: HAPPY!'
            self.play_random_song_from_folder("happy")

        elif mood == 'Negative':
            # Check if a song is already playing
            if sound and sound.state == 'play':
                sound.stop()

            self.mood_label.text = f'YOU ARE CURRENTLY FEELING: SAD!'
            self.play_random_song_from_folder("sad")

        elif mood == 'Punjabi':
            # Check if a song is already playing
            if sound and sound.state == 'play':
                sound.stop()

            self.mood_label.text = f'YOU ARE CURRENTLY FEELING: Punjabi!'
            self.play_random_song_from_folder("Punjabi")

        elif mood == 'Neutral':
            self.mood_label.text = "CURRENTLY YOUR MOOD IS NEUTRAL!"


if __name__ == '__main__':
    ChatBotApp().run()
