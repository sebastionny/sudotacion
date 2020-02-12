import { Component, OnInit, Input } from '@angular/core';
import {_DATOS_} from '../service/constans'
import { Item } from '../items.modelo';
import { AppComponent } from '../app.component';
import { Router } from '@angular/router';

@Component({
  selector: 'app-detalle',
  templateUrl: './detalle.component.html',
  styleUrls: ['./detalle.component.scss']
})
export class DetalleComponent implements OnInit {

  __DATOS__;
  @Input() itemDetail : Item;
  prendas: string[];
  constructor( private app: AppComponent,
    private readonly router: Router) {   }

  ngOnInit() {
    this.__DATOS__=_DATOS_;
    this.prendas = this.itemDetail.prendas.split(";")
  }

  onClick(){
    this.router.navigate(['contacto'])
    console.log(`Nueva sección`)
  }

  onExit(): void{
  this.app.itemSelected = null;
  }

}
