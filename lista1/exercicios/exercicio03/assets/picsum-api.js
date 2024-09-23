const picsumBaseURL = 'https://picsum.photos';


const axiosConfig = {
    baseURL: picsumBaseURL,
    headers: {
        'Content-Type': 'application/json',
    },
};

function getRandomPictures(height = 300, width = 300) {
    console.log({...axiosConfig, url: `/${width}/${height}`});
    return axios({...axiosConfig, url: `/${width}/${height}`});
}

// function indexPhotos(params) {
//     return axios.get({...axiosConfig, {url: }});
// }