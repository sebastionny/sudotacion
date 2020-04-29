import { Component } from '@angular/core';
import { Item } from './items.modelo';
import { _DATOS_ } from './service/constans';
import { _ITEMS_ } from './service/items';
import {
  fadeInOnEnterAnimation, fadeOutOnLeaveAnimation,
  zoomInAnimation,
  zoomInDownAnimation,
  zoomInLeftAnimation,
  zoomInRightAnimation,
  zoomInUpAnimation,
  zoomOutAnimation,
  zoomOutDownAnimation,
  zoomOutLeftAnimation,
  zoomOutRightAnimation,
  zoomOutUpAnimation,
  rubberBandAnimation
} from 'angular-animations';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
  animations: [
    fadeInOnEnterAnimation(),
    rubberBandAnimation(),
    fadeOutOnLeaveAnimation(),
    zoomInAnimation(),
    zoomInDownAnimation(),
    zoomInLeftAnimation(),
    zoomInRightAnimation(),
    zoomInUpAnimation(),
    zoomOutAnimation(),
    zoomOutDownAnimation(),
    zoomOutLeftAnimation(),
    zoomOutRightAnimation(),
    zoomOutUpAnimation()
  ]
})
export class AppComponent {
  title = 'sudotacion';
  items: Item[] = [];
  condition = false;
  itemSelected: Item = null;

  constructor() {
    this.items = _ITEMS_.items;
  }

}
