/* Check for theme preferences to put it
* ------------------------------------------------------ */
( () => {

    let theme = localStorage.getItem('emblr-theme')
    let theme_checkbx = document.querySelector('#emblr-theme-check')
    
    if ( !theme )

        localStorage.setItem(
            'emblr-theme',
            theme = document.body.classList.contains('light-theme') ?
                'light-theme' : 'dark-theme'
        )

    ;


    document.cookie = `emblr_theme=${theme}`


    if ( theme === 'light-theme' && false === theme_checkbx.checked )
        theme_checkbx.checked = true
    
    else if ( theme === 'dark-theme' && theme_checkbx.checked )
        theme_checkbx.checked = false

    ;


    if ( false === document.body.classList.contains(theme) ) {

        if ( theme === 'light-theme' ) {
            document.body.classList.add('light-theme')
            document.body.classList.remove('dark-theme')

        } else {
            document.body.classList.add('dark-theme')
            document.body.classList.remove('light-theme')
        }
        
    }
    
})()