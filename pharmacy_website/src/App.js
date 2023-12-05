import React from 'react';
import './App.css';
import Home from './Home';
//import 'bootstrap/dist/css/bootstrap.css';
import Header from './components/Header';

function App() {
  return (
    <div className='grid-container'>
      <Home/>      
      <Header/>
    </div>
  );
}

export default App;
