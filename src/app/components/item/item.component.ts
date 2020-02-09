import { Component, OnInit, Input } from '@angular/core';
import { Item } from 'src/app/items.modelo';

@Component({
  selector: 'app-item',
  templateUrl: './item.component.html',
  styleUrls: ['./item.component.scss']
})
export class ItemComponent implements OnInit {

  @Input() item: Item= null;
  description: string;

  constructor() { }

  ngOnInit() {
  }

  onClick(){
    console.log(`Holaaa item`)
  }

}
