import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom';

import Home from './Components/home'
import "bootstrap/dist/css/bootstrap.css";
import "remixicon/fonts/remixicon.css";
// import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";  
import 'slick-carousel/slick/slick.css';


if(document.getElementById('app')){
    ReactDOM.render(<Home/>,document.getElementById('app'));
}
