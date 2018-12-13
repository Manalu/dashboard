import React from 'react';
import ReactHighcharts from 'react-highcharts';

/**
 * Highcharts config constructor
 *
 * @param {array} data
 * @param {int} month
 * @return {{yAxis: {title: {text: string}}, xAxis: {categories: Array, title: {text: string}}, series: {data: Array}[], title: {text: string}}}
 * @constructor
 */
const Config = function (data, month) {
  this.data = data;
  this.month = month;
  this.year = new Date().getFullYear();

  this.getMaxDays = () => new Date(this.year, this.month, 0).getDate();
  this.findDays = (data, day) => data.find(item => +item.day === day);

  this.getDays = () => {
    const daysArray = [];

    for (let i = 1; i <= this.getMaxDays(this.month); i++) {
      daysArray.push(i);
    }
    return daysArray;
  };

  this.getData = () => {
    const daysArray = [];

    for (let i = 1; i <= this.getMaxDays(this.month); i++) {
      const res = this.findDays(this.data, i);
      res ? daysArray.push(+res.total) : daysArray.push(0);
    }
    return daysArray;
  };

  return {
    title: {text: "Orders"},
    xAxis: {
      title: {text: "Days"},
      categories: this.getDays()
    },
    yAxis: {
      title: {text: "Amount"},
    },
    series: [{
      data: this.getData()
    }]
  };
};

export default ({data, month}) => <ReactHighcharts config={new Config(data, month)}/>
