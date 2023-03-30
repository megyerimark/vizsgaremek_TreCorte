import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AdminloginComponent } from './admin/adminlogin/adminlogin.component';
import { AdminregisterComponent } from './admin/adminregister/adminregister.component';

const routes: Routes = [
  {path:"admin/register", component:AdminregisterComponent},
  {path:"admin/login", component:AdminloginComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
