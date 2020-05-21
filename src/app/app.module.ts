import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { ItemComponent } from './components/item/item.component';
import { FooterComponent } from './footer/footer.component';
import { DetalleComponent } from './detalle/detalle.component';
import { BrowserAnimationsModule} from '@angular/platform-browser/animations';
import { ContactoComponent } from './contacto/contacto.component';
import { RootComponent } from './root/root.component';
import { HttpClientModule } from '@angular/common/http';
import { ProductServiceService } from './service/product-service.service';


@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    ItemComponent,
    FooterComponent,
    DetalleComponent,
    ContactoComponent,
    RootComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    HttpClientModule,
  ],
  providers: [ProductServiceService],
  bootstrap: [RootComponent]
})
export class AppModule { }
