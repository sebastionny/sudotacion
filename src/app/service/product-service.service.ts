import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { _DATOS_ } from './constans';
import { Observable } from 'rxjs';
import { Item } from '../items.modelo';

@Injectable({
  providedIn: 'root'
})
export class ProductServiceService {

  constructor(
    private http: HttpClient ) {}

    // Recuperar los datos
    cargarProductos(): Observable<any>{
      return this.http.get( _DATOS_.pathBase + 'items.json' );
  }
}
