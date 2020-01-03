/* Terminal Functions */


(function() {

  let $prompt = document.getElementById('prompt')
  let $prev = document.getElementById('prev')
  let $prompt_field = document.getElementById('prompt-field')
  let $terminal_window = document.querySelector('.terminal__window')

  const fields_txt = [
    'nombre',
    'correo',
    'déjanos tu consulta',
    'Escribe #enviar para confirmar tu mensaje'
  ]

  const render = s => {
    s.forEach(s => {
      let out = document.createElement('pre')

      if (s.r.indexOf("#") != -1) {
        let keyword_text = s.r.match(/#[^\s]+/)[0]
        s.r = s.r.split(keyword_text)

        let pre_keyword = document.createElement('span') // object
        pre_keyword.innerText = s.r[0]

        let keyword = document.createElement('span') //object
        keyword.className = 'keyword_text'
        keyword.innerText = keyword_text.replace("#", "")

        let post_keyword = document.createElement('span') // object
        post_keyword.innerText = s.r[1]

        // append
        out.appendChild(pre_keyword)
        out.appendChild(keyword)
        out.appendChild(post_keyword)

      } else {
        out.innerText = s.r
      }

      out.className += s.c || ''
      $prev.appendChild(out)
    })
    
    // scroll to last output
    $terminal_window.scrollTop = $terminal_window.scrollHeight
  }

  const render_editable = s => {
    s.forEach(s => {
      let out_editable
      
      if (s.t == 'i') {
        out_editable = document.createElement('input')
        out_editable.type = "text"
      } else { // s.t == 'a'
        out_editable = document.createElement('textarea')
      }
      
      out_editable.name = s.n
      out_editable.autocomplete = "off"
      out_editable.className += s.c || ''
      out_editable.value = s.r
      
      let $input = document.createElement('div')
      $input.className = "input"
      $input.appendChild($prompt_field.cloneNode(true))
      $input.appendChild(out_editable)
      
      $prev.appendChild($input)
    })
    
    // scroll to last output
    $terminal_window.scrollTop = $terminal_window.scrollHeight
  }

  const cout = t => render([{r: t, c: 'out'}])
  const cout_f = t => render([{r: t, c: 'out_f'}])
  const cerr = t => render([{r: t, c: 'err'}])
  const cok = t => render([{r: t, c: 'ok'}])
  const cout_i = ( t, n ) => render_editable([{r: t, c: 'out_i', t: 'i', n: n}])
  const cout_a = ( t, n ) => render_editable([{r: t, c: 'out_a', t: 'a', n: n}])

  const removeElement = (array, element) => {
    const index = array.indexOf(element)
    const newArray = [...array] // destructuring assignment

    if (index >= -1) {
      newArray.splice(index, 1)
    }

    return newArray
  }

  var init = () => {
    n = 0
    cok('domain: ensambler.cl@127.0.0.1 ~\nReady .')
  }

  init()

  // primer mensaje: nombre
  cout('$ #(1/3) Escribe tu ' + fields_txt[n] + ' [presiona enter]')

  // $prompt.focus()
  // $prompt.select()

  const clean_failed = () => {
    let outs_err = document.getElementsByClassName("err")
    let outs_failed = document.getElementsByClassName("out_f")

    while(outs_err.length > 0) outs_err[0].remove()
    while(outs_failed.length > 0) outs_failed[0].remove()
  }

  const parse = s => {
    if (s.length === 0) return false
    
    // MANEJO DE ERRORES
    if (n == 0) { //err nombre
      if (!/^[A-Za-zÁáÉéÍíÓóÚúñ\s]+$/.test(s)) {
        cout_f(s)
        cerr('error: ingresar sólo letras\n\n')
        $prompt.value = ""
        
        return false
      }
      
      s = $prompt.value.split(" ")
      for(var i = 0 ; i < s.length ; i++) s[i] = s[i].charAt(0).toUpperCase() + s[i].slice(1)
      $prompt.value = s.join(" ")
      
    } else if (n == 1) { //err correo
      if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(s)) {
        cout_f(s)
        cerr('error: correo inválido\n\n')
        $prompt.value = ""
        
        return false
      }
      
      $prompt.value = s.charAt(0).toLowerCase() + s.slice(1)
      
    } else if (n == 2) { //err mensaje
      if (s.length < 15) {
        cout_f(s)
        cerr('error: mínimo 15 caracteres\n\n')
        $prompt.value = ""
        
        return false
      }
      
      $prompt.value = s.charAt(0).toUpperCase() + s.slice(1)
      
    } else if (n == 3) { //err enviar
      s = s.toLowerCase().replace(/ /g, '')
      $prompt.value = s.charAt(0).toLowerCase() + s.slice(1)
      
      if (s !== 'enviar') {
        cout_f(s)
        cerr('error: escribe "enviar" y presiona enter\n\n')
        $prompt.value = ""
        
        return false
      }
    }
    
    n++
    return true
  }

  let history = []
  let h = 1

  let name

  $prompt.addEventListener('keydown', e => {
    if (e.key === 'Enter') {
      if (!$prompt.value.replace(/ /g, '')) return false
      
      result = parse($prompt.value)
      
      if (!result) return
   	
      // outs & name:
      if (n == 1) {
        name = $prompt.value.split(" ")[0] // obtiene sólo nombre
        cout_i($prompt.value, 'nombre')
      }

      if (n == 2) cout_i($prompt.value, 'email')
      else if (n == 3) cout_a($prompt.value, 'consulta')
      
      history.push($prompt.value)
      h = history.length
      
      $prompt.value = ""
      
      if (n < 2) {
        cout('\n$ #(' + (n + 1) + '/3) ' + name +  ', escribe tu ' + fields_txt[n] + ' [presiona enter]') // correo
        
      } else if (n == 2) {
        cout('\n$ #(' + (n + 1) + '/3) ' + name +  ', ' + fields_txt[n] + ' [presiona enter]') // mensaje
        
      } else if (n == 3) {
        let outs = document.getElementsByClassName("out")
        
        clean_failed()
        
        for(var i = 0 ; i < outs.length ; i++) {
          let field = fields_txt[i].split(" ").pop()
          outs[i].innerHTML = (i > 0 ? "\n" : "") + "$ [" + field.charAt(0).toUpperCase() + field.slice(1) + "] ~"
          outs[i].nextSibling.childNodes[1].classList.add("input_enabled")
        }

        $prompt.placeholder = "enviar"
        cout('\n\n$ ' + fields_txt[n] + ' [presiona enter]') // -> enviar
        
      } else if (n == 4) {
        let outs_input = document.getElementsByClassName("out_i")
        for(var i = 0 ; i < outs_input.length ; i++) {
          outs_input[i].disabled = true
          outs_input[i].classList.add("input_disabled")
        }
        
        let outs_textarea = document.getElementsByClassName("out_a")[0]
        outs_textarea.disabled = true
        outs_textarea.classList.add("input_disabled")
        
        clean_failed()
        $prev.lastChild.remove()
        
        $prompt_field.style.display = "none"
        $prompt.style.display = "none"

        var progress_bar = document.createElement("div")
        progress_bar.className = "progress-bar"

        $prev.appendChild(progress_bar)
        progress_bar.className += " progress-bar-fill"

        // Se esperan 1500ms a que termine la animación de cargando (fake)
        setTimeout(() => {
          // Se envían datos a la función general de envío:
          window.sendContactForm( '#terminal-form', ( response ) => {
            //callback:
            if ( 'OK' === response ) {
              // success
              cok('\n\n> Mensaje enviado.\nTe responderemos a la brevedad. ~\n\n\n')
              cok('Done .')

            } else {
              // failure
              cerr( '\n\n> No se envió el mensaje\n' )
              cerr( `Detalle: ${response} ~` )
            }

          })
        }, 1500)
 
      }
      
    } else if (e.key === 'ArrowUp') {
      if (h <= history.length && h > 0) {
        $prompt.value = history[--h]
      }
      
    } else {
      h = history.length
    }
  })

})()