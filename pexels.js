const apiKey = 'Hsgz7ponkG69sUcV0OkJNdyiCBRsBI6Uy6vBujPjPOoScX4VGoLpJzBl';

async function fetchImages(terms) {
    
    const url = 'https://api.pexels.com/v1/search?query=';
    const urls = terms.map(term => `${url}${term}&per_page=20`);

    const fetchPromises = urls.map(url => fetch(url, { headers: { Authorization: apiKey } }).then(response => response.json()));
    const allPhotos = [];

    try {
        const dataArray = await Promise.all(fetchPromises);
        

        dataArray.forEach(data => {
            if (typeof data === 'object' && data !== null && Array.isArray(data.photos)) {
                
                data.photos.forEach(photo => {
                   allPhotos.push(photo);
                   
                    
                });
            } else {
                console.log('Invalid response data:', data);
                document.getElementById('responseM').innerHTML = data.toString();
            }
        });

        console.log('Total photos:', allPhotos.length);

        return allPhotos;
    } catch (error) {
        console.error('Error fetching images:', error);
        throw error;  }
}

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]]; // Swap elements at indices i and j
    }
    return array;
}
async function displayImages(terms) {
    const moodboard = document.getElementById('moodboard');
    moodboard.innerHTML='';
    
    let images = await fetchImages(terms);
    console.log(`typeof:${typeof images}`);
    console.log(`length:${images.length}`);
    images =shuffleArray(images);

    

    for (let i=0; i<9 ;i++){
        const imgElementLink = document.createElement('a');
        imgElementLink.setAttribute('href',images[i].url);
        const imgElement = document.createElement('img');
        imgElement.setAttribute('id',"photo"+ (i+1));
        imgElement.src= images[i].src.large;
        
        //console.log('IMAGE-> ' ,images[randomToken]['src']['large']);
        imgElementLink.appendChild(imgElement);
        moodboard.appendChild(imgElementLink);
        
 
        
    }
    const button = document.getElementById('button');
    //button.setAttribute('type',"Submit");
    //button.setAttribute('onclick',"store()");
    const form = document.getElementById('form');
    form.appendChild(button);
}

function searchImages(){
    const terms = [];

    const searchTerm1 = document.getElementById('searchInput1').value;
    const searchTerm2 = document.getElementById('searchInput2').value;
    const searchTerm3 = document.getElementById('searchInput3').value;
    //const searchTerm1 = 'party';
    //const searchTerm2 = 'cow';
    //const searchTerm3 = 'pink';
        
    if (searchTerm1 !==''){
        terms.push(searchTerm1);
    }

    if (searchTerm2 !==''){
        terms.push(searchTerm2);
        }

    if (searchTerm3 !==''){
        terms.push(searchTerm3);
        }

    
    console.log(" How many terms: " +terms.length);
    if (terms.length==0){
        return;
    }
    else{
    displayImages(terms);
    }
}
