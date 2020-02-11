import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { Item } from 'src/app/items.modelo';
import { AppComponent } from 'src/app/app.component';

@Component({
  selector: 'app-item',
  templateUrl: './item.component.html',
  styleUrls: ['./item.component.scss']
})
export class ItemComponent implements OnInit {

  @Input() item: Item= null;
  @Output() itemSelect = new EventEmitter<Item>();
  description: string;

  constructor( private App: AppComponent) { }

  ngOnInit() {
  }

  onClick(item? :Item){
    this.itemSelect.emit(item);
    this.App.condition = true;
  }

}
