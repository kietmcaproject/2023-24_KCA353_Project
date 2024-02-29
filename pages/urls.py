from django.urls import path
from . import views

urlpatterns = [
    path("", views.index, name="index"),
    path("about", views.about, name="about"),
    path("contact", views.contact, name="contact"),
    path("login", views.login, name="login"),
    path("register", views.register, name="register"),
    path("studentlogin", views.studentlogin, name="studentlogin"),
    path("counsellorlogin", views.counsellorlogin, name="counsellorlogin"),
    path("studentregister", views.studentregister, name="studentregister"),
    path("counsellorregister", views.counsellorregister, name="counsellorregister"),
    path("dashboard1", views.dashboard1, name="dashboard1"),
    path("dashboard2", views.dashboard2, name="dashboard2"),
    path("logout", views.logout, name="logout"),
    path("enrolledcourse/<int:course_id>", views.enrolledcourse, name="enrolledcourse"),
    path("viewCourse/<int:course_id>", views.viewCourse, name="viewCourse"),
    path("browseCourses", views.browseCourses, name="browseCourses"),
    path("browseCounsellor", views.browseCounsellor, name="browseCounsellor"),
    path("doenroll/<int:coursekey>", views.doenroll, name="doenroll"),
]
