import React, {Component} from "react";
import {observer} from "mobx-react";
import MonthRangePicker from '../../common/monthRangePicker';

const MainComponent = observer(
  class Main extends Component {

    constructor(props) {
      super(props);
      this.props.storage.getOrder();
    }

    render() {
      return <div>

        <h1>Orders</h1>

        <MonthRangePicker storage={this.props.storage}/>

        <table className="ui celled table">
          <thead>
          <tr>
            <th>Date</th>
            <th>Country</th>
            <th>Device</th>
            <th>Customer</th>
            <th>Items</th>
            <th>Quantity</th>
            <th>EAN</th>
            <th>Total amount</th>
          </tr>
          </thead>

          <tbody>
          {this.props.storage.order.map((item, index) =>
            <tr key={index}>
              <td>{item.date}</td>
              <td>{item.country}</td>
              <td>{item.device}</td>
              <td>{item.first_name}</td>
              <td>{item.items}</td>
              <td>{item.quantity}</td>
              <td>
                <table className="ui very compact table">
                  {item.ean.split(',').map((el, i) =>
                    <tr key={i}>
                      <td>{el}</td>
                    </tr>
                  )}
                </table>
              </td>
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
