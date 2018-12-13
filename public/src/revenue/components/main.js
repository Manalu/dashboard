import React, {Component} from "react";
import {observer} from "mobx-react";
import Chart from './chart';
import MonthPicker from '../../common/monthPicker';

const MainComponent = observer(
  class Main extends Component {

    constructor(props) {
      super(props);
      this.props.storage.getRevenues();
    }

    setMonth = month => {
      this.props.storage.month = month;
      this.props.storage.getRevenues();
    };

    render() {
      return <div>
        <h1>Revenues</h1>

        <MonthPicker callback={this.setMonth}/>

        <div className="chart">
          <Chart
            data={this.props.storage.revenue.chart} month={this.props.storage.month}/>
        </div>

        <table className="ui celled table">
          <thead>
          <tr>
            <th>Total Orders</th>
            <th>Total Items</th>
            <th>Total Countries</th>
            <th>Total Devices</th>
            <th>Total Customers</th>
            <th>Total Amount</th>
          </tr>
          </thead>

          <tbody>
          {this.props.storage.revenue.table.map((item, index) =>
            <tr key={index}>
              <td>{item.orders}</td>
              <td>{item.items}</td>
              <td>{item.country}</td>
              <td>{item.device}</td>
              <td>{item.customers}</td>
              <td>{item.total}</td>
            </tr>
          )}
          </tbody>
        </table>
      </div>;
    }
  }
);

export default MainComponent;
