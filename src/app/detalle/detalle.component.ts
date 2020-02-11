import { Component, OnInit, Input } from '@angular/core';
import {_DATOS_} from '../service/constans'
import { Item } from '../items.modelo';
import { AppComponent } from '../app.component';

@Component({
  selector: 'app-detalle',
  templateUrl: './detalle.component.html',
  styleUrls: ['./detalle.component.scss']
})
export class DetalleComponent implements OnInit {

  __DATOS__;
  @Input() itemDetail : Item;
  constructor( private app: AppComponent) {   }

  ngOnInit() {
    this.__DATOS__=_DATOS_;
  }

  onClick(){
    console.log(`Nueva sección`)
  }

  onExit(){
  this.app.itemSelected = null;
  console.log(`Quiero cerrar`)
  }

}
