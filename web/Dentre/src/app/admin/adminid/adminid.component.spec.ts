import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AdminidComponent } from './adminid.component';

describe('AdminidComponent', () => {
  let component: AdminidComponent;
  let fixture: ComponentFixture<AdminidComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AdminidComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AdminidComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});