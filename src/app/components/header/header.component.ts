import { Component, OnInit } from '@angular/core';
import {_DATOS_} from '../../service/constans';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {

  __DATOS__;

  constructor() { 
    this.__DATOS__= _DATOS_;
  }

  ngOnInit() {
    
  }

}
