import React, {Component} from "react";
import MonthPicker from './monthPicker';
import {Button} from 'semantic-ui-react'

class monthRangePicker extends Component {

  constructor(props) {
    super(props);
  }

  handlerClick = () => {
    this.props.storage.getOrder();
  };

  setMonth = type => {
    return month => {
      this.props.storage.monthRange[type] = month;
    };

  };

  render() {
    return (
      <div>
        <MonthPicker callback={this.setMonth('from')}/>
        <MonthPicker callback={this.setMonth('to')}/>
        <Button secondary onClick={this.handlerClick}>Apply</Button>
      </div>
    );
  }
}

export default monthRangePicker;
