import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import {  HttpClientModule} from "@angular/common/http";
import { AppComponent } from './app.component';
import { AdminregisterComponent } from './admin/adminregister/adminregister.component';
import { AdminidComponent } from './admin/adminid/adminid.component';
import { AdminloginComponent } from './admin/adminlogin/adminlogin.component';


@NgModule({
  declarations: [
    AppComponent,
    AdminregisterComponent,
    AdminidComponent,
    AdminloginComponent,


  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    HttpClientModule,
    ReactiveFormsModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
