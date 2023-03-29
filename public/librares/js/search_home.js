var searchInput = document.querySelector('#search');
var autoComplete = document.querySelector('#autocomplete');

searchInput.addEventListener('input', _.throttle(async event => {

    try {
        if (event.target.value.length >= 3) {
            const { data } = await axios.get('/model/Data_Base/LoanDataBase.php', {
                params: {
                    book: event.target.value
                }
            })
            console.log(data);
        }
    } catch (error) {
        console.log(error)
    }
}, 500))