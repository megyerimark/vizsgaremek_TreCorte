import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './user/login/login.component';
import { RegisterComponent } from './user/register/register.component';
import { AdminregisterComponent } from './admin/adminregister/adminregister.component';
import { AdminidComponent } from './admin/adminid/adminid.component';
import { AdminloginComponent } from './admin/adminlogin/adminlogin.component';
import { ServiceComponent } from './admin/service/service.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    RegisterComponent,
    AdminregisterComponent,
    AdminidComponent,
    AdminloginComponent,
    ServiceComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
