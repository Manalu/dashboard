import React from 'react';
import { Menu } from 'semantic-ui-react';

const defaultItems = [
  {key: 'home', href: '/', active: true, name: 'Home'},
  {key: 'customer', href: '/customer/', name: 'Customers'},
  {key: 'order', href: '/order/', name: 'Orders'},
  {key: 'revenue', href: '/revenue/', name: 'Revenues'},
];

const MenuComponent = ({active}) => {
  const items = defaultItems.map(item => {
    item.active = item.key === active;
    return item;
  });
  return <Menu items={items}/>;
};
export default MenuComponent;
