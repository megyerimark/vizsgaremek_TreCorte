import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Adminauthsercive } from '../service/adminauthservice.service';


@Component({
  selector: 'app-adminregister',
  templateUrl: './adminregister.component.html',
  styleUrls: ['./adminregister.component.scss']
})

export class AdminregisterComponent {

  form!: FormGroup;
  submitted!: boolean;

  constructor(
    private auth: Adminauthsercive,
    private formBuilder: FormBuilder,
    private router: Router,

  ) { }

  ngOnInit(): void {
    this.form = this.formBuilder.group({
      name:['', Validators.required],
      email:['', Validators.required],
      password:['', Validators.required],
      confirm_password:['', Validators.required]
    })
  }

  register() {
    let name = this.form.value.name;
    let email = this.form.value.email;
    let password = this.form.value.password;
    let confirm_password = this.form.value.confirm_password;

    this.auth.register( name, email,password,confirm_password).subscribe({
       next : data =>{


        localStorage.setItem('newAuthData', JSON.stringify(data));
        this.router.navigate(['admin/login']);
        alert("sikeres regisztráció");
       },

       error: err => {
        alert("sikertelen regisztráció");



      }
    });
  }

}
