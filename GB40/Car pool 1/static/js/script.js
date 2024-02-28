const accessKey="5R-m5zRgJKQ5vFr6EzPO0ID1jCrRQCYqlxPnDWQA_98"

const formEl= document.querySelector("form")
const inputEl=document.getElementById("search-input")
const searchResults= document.querySelector(".search-results")
const showMore= document.getElementById("show-more-button")

let inputData=""
let page=1;

async function searchImages(){
    inputData= inputEl.Value;
    const url= `https://api.unsplash.com/search/photos?page=${page}&query=${inputData}&client_id=${accessKey}`

    const response= await fetch(url)
    const data= await response.json()

    const results= data.results

    if(page===1){
        searchResults.innerHTML=""
    }
    results.map((result)=>{
        const imagerWrapper= document.createElement('div')
        imagerWrapper.classList.add("search-result")
        const image= document.createElement('img')
        image.src= result.urls.small
        image.alt- result.alt_description
        const imageLink= document.createElement('a')
        imageLink.href= result.link.html
        imageLink.target= "_blank"
        imageLink.textContent= result.alt_description

        imagerWrapper.appendChild(image);
        imagerWrapper.appendChild(imageLink);
        searchResults.appendChild(imagerWrapper);
    });


    // for add more pages
    page++
    if(page>1){
        showMore.style.display= "block"
    }
}

formEl.addEventListener("submit",(event)=>{
    event.preventDefault()
    page=1;
    searchImages()

})

showMore.addEventListener("click",()=>{
    searchImages();

})