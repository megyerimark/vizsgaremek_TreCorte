import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Adminauthsercive } from '../service/adminauthservice.service';

@Component({
  selector: 'app-adminlogin',
  templateUrl: './adminlogin.component.html',
  styleUrls: ['./adminlogin.component.scss']
})
export class AdminloginComponent {


  form!:FormGroup;
submitted!: boolean;

constructor(
  private auth: Adminauthsercive,
  private formBuilder: FormBuilder,
  private router: Router,
  ) {}

  ngOnInit(): void {
    this.form = this.formBuilder.group({
      email:['', Validators.required],
      password: ['', Validators.required]
    });
    }

    alogin(){
      const email = this.form.value.email;
      const password = this.form.value.password;

      this.auth.alogin(email,password).subscribe({
        next: data =>{
          if(data.success){
            localStorage.setItem('currentUser', JSON.stringify({token: data.data.token, name: data.data.name}));
            this.router.navigate(['admin/index']);
            this.toastr.success('Sikeres bejelentkezés')
          }else{
            this.toastr.error("Sikertelen bejelentkezés");
          }
        }
      });
    }
}
