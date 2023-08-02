import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App';
import { HashRouter } from 'react-router-dom';

document.addEventListener( 'DOMContentLoaded', function() {
    var element = document.getElementById( 'cmmeta-admin-app' );
    if( typeof element !== 'undefined' && element !== null ) {
        const root = ReactDOM.createRoot(document.getElementById('cmmeta-admin-app'));
            root.render(<HashRouter><App /></HashRouter>);
    }
} )


