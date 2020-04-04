import { Component, OnInit } from '@angular/core';
import {_DATOS_} from '../service/constans'

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {

  __DATOS__;
  constructor() {
    this.__DATOS__= _DATOS_;
  }

  ngOnInit() {
  }

}
