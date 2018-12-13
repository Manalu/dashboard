import React, {Component} from "react";
import {observer} from "mobx-react";

const MainComponent = observer(
  class Main extends Component {

    constructor(props) {
      super(props);
      this.props.storage.getCustomer();
    }

    render() {
      return <div>

        <h1>Customers</h1>

        <table className="ui celled table">

          <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Total orders</th>
            <th>Total amount</th>
          </tr>
          </thead>

          <tbody>
          {this.props.storage.customer.map((item, index) =>
            <tr key={index}>
              <td>{item.first_name}</td>
              <td>{item.last_name}</td>
              <td>{item.email}</td>
              <td>{item.orders}</td>
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
