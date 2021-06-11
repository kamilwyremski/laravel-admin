require('./bootstrap');

require('alpinejs');

import Sortable from './Sortable';

document.addEventListener("DOMContentLoaded", function() {
  let sortable = document.getElementById('sortable')
  if(sortable){
    Sortable.create(sortable, {
      handle: ".sortable-handle"
    });
  }
})

import sortTable from './sortTable';

window.sortTable = sortTable;

import lfm from './lfm';

window.lfm = lfm;
