import React from "react";
import ReactDOM from "react-dom";
import MainComponent from './components/main';
import Menu from "../common/menu";
import './style.styl';

ReactDOM.render(
  <div className="ui container">
    <Menu active="home"/>
    <MainComponent/>
  </div>,
  document.getElementById('root')
);
