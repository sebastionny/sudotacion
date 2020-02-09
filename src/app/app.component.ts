import { Component } from '@angular/core';
import { Item } from './items.modelo';
import { _DATOS_ } from './service/constans';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'sudotacion';
  items: Item[]= [];

  constructor(){
    this.items = _DATOS_.items;
    console.table(this.items)
  }
  
}
