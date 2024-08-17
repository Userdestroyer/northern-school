import './bootstrap';

// Import bootstrap
import * as bootstrap from 'bootstrap';

import {wait} from './utils/wait'

window.App = {
    els: {
      
    },
    stateClasses: {
      domReady: 'dom-is-ready',
      mobileDevice: 'is-mobile-device'
    },
    defaultScrollableElements: []
  }

//импорт модулей
// import Listener from './modules/listener'
// import { MultiselectTableCollection } from './modules/multiselectTable'

const handleDOMReady = () => {
//   App.Listener = new Listener()
//   App.MultiselectTableCollection = new MultiselectTableCollection()

  // prevent transition flicker
  wait(100).then(() => {
    document.documentElement.classList.add(App.stateClasses.domReady)
  })
}

const bindEvents = () => {
  document.addEventListener('DOMContentLoaded', () => {
    handleDOMReady()
  })
  console.log('PRIVET')

//   document.addEventListener('turbo:load', () => {
//     handleDOMReady()
//   })
}

bindEvents()