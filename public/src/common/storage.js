import {decorate, observable, action} from "mobx";
const currentMonth = new Date().getMonth() + 1;

/**
 * This is a global storage
 * It is responsible for receiving data
 */
class Storage {
  constructor() {
    this.customer = [];
    this.order = [];
    this.revenue = {
      chart: [],
      table: []
    };
    this.monthRange = {
      from: currentMonth,
      to: currentMonth
    };
    this.month = currentMonth;
  }

  /**
   * Static method to perform ajax request to the server
   *
   * @param module
   * @param params
   * @param action
   * @returns {Promise<Response | never>}
   */
  static getData(module, params = '', action = 'data') {
    return fetch(`/${module}/${action}/${params}`).then(response => {
      return response.json();
    });
  }

  getCustomer() {
    Storage.getData('customer')
      .then(result => {
        this.customer = result;
      }).catch(e => {
      throw new Error(e);
    });
  }

  getOrder() {
    Storage.getData('order', `?from=${this.monthRange.from}&to=${this.monthRange.to}`)
      .then(result => {
        this.order = result;
      }).catch(e => {
      throw new Error(e);
    });
  }

  async getRevenues() {
    try {
      const chart = await Storage.getData('revenue', `?month=${this.month}`, 'chart');
      const table = await Storage.getData('revenue', `?month=${this.month}`, 'data');
      this.revenue = {chart, table};
    } catch (e) {
      throw new Error(e);
    }
  }

}

export default decorate(Storage, {
  customer: observable,
  revenue: observable,
  order: observable,
  getCustomer: action,
  getOrder: action,
  getRevenues: action
});
