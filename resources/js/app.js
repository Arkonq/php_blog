require('./bootstrap');



const toggleFavorite = (id) => {

    axios.put(`/posts/${id}/favorite`)
        .then((response) => {

            let favoriteButton = document.getElementById('favorite-button')
            favoriteButton.innerHTML =
                response.data.favorite ? 'В избранном' : "Добавить в избранное"
        })
}

document.addEventListener('DOMContentLoaded', () => {

    let favoriteButton = document.getElementById('favorite-button')


    if (!favoriteButton)
        return

    favoriteButton.addEventListener('click', ()=>{
        let id = favoriteButton.dataset.id ?? null
        toggleFavorite(id)
    })

})
