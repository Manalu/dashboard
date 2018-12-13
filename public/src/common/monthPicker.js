import { Dropdown } from 'semantic-ui-react';
import React from 'react';

const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December"
];

const currentMonth = new Date().getMonth();
const monthOptions = months.map((item, index) => ({key: item, text: item, value: index + 1}));

const monthPicker = ({callback}) => (
  <Dropdown
    button
    className='icon'
    floating
    selection
    labeled
    icon='calendar alternate outline'
    options={monthOptions}
    defaultValue={monthOptions[currentMonth].value}
    onChange={(e, data) => {
      callback(data.value);
    }}
  />
);

export default monthPicker;
