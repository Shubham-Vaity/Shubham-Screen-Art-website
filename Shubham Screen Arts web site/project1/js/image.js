let searchParam = location.search.split('=').pop();

const access_key = 'qFQYz3meVWGi0_WtRlePs_EofiafLn5MdrPiLzNv3hY';

const random_photo_url = `https://api.unsplash.com/photos/random?client_id=${access_key}&count=1000`;
const search_photo_url = `https://api.unsplash.com/search/photos?client_id=${access_key}&query=${searchParam}&per_page=50`;


const Gallary = document.querySelector('.Gallary');

let currentImage=0;

let allImages; //this will store all images

const getImages = () => {
    fetch(random_photo_url)
    .then(res =>  res.json())
    .then(data => {
        allImages = data;
        makeImages(allImages);
    });
}

const searchImages = () => {
    fetch(search_photo_url)
    .then(res =>  res.json())
    .then(data => {
        allImages = data.results;
        makeImages(allImages);
    });
}


const makeImages = (data) => {
    console.log(data);
    data.forEach((item,index) =>  {
        

        let img = document.createElement('img');
        img.src = item.urls.regular;
        img.className = 'gallary-img';

        Gallary.appendChild(img);

        img.addEventListener('click', () => {
          currentImage=index;
          showPopup(item);
        })
    })
}

const showPopup = (item) => {
    let popup=document.querySelector('.image-popup');
    const downloadbtn=document.querySelector('.download-btn');
    const closebtn=document.querySelector('.close-btn');
    const image=document.querySelector('.large-img');

    popup.classList.remove('hide');
    downloadbtn.href=item.links.html;
    image.src= item.urls.regular;

    closebtn.addEventListener('click', () => {
        popup.classList.add('hide');
    })
}

if(searchParam == '')
{
getImages();
} else{
    searchImages();
}

const preBtns=document.querySelector('.pre-btn');
const nxtBtns=document.querySelector('.nxt-btn');

preBtns.addEventListener('click', () => {
    if(currentImage > 0){
        currentImage--;
        showPopup(allImages[currentImage]);
    }

})

nxtBtns.addEventListener('click', () => {
    if(currentImage < allImages.length-1){
        currentImage++;
        showPopup(allImages[currentImage]);
    }

})