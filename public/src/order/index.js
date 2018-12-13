import React from "react";
import ReactDOM from "react-dom";
import Storage from '../common/storage';
import MainComponent from './components/main';
import Menu from '../common/menu';
import './style.styl';

const storage = new Storage();

ReactDOM.render(
  <div className="ui container">
    <Menu active="order"/>
    <MainComponent storage={storage}/>
  </div>,
  document.getElementById('root')
);
