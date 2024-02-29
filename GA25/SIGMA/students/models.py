from django.db import models
from courses.models import courses
from datetime import datetime
from django.contrib.auth.models import User


# Create your models here.
class students(models.Model):
    students_id = models.ForeignKey(User, primary_key=True, on_delete=models.CASCADE)
    firstName = models.CharField(max_length=100)
    lastName = models.CharField(max_length=100)
    username = models.CharField(max_length=200)
    phoneNo = models.CharField(max_length=100)
    email = models.EmailField()
    gender_choices = (
        ("1", "MALE"),
        ("2", "FEMALE"),
        ("3", "Any other"),
    )
    gender = models.CharField(max_length=20, choices=gender_choices, default="1")
    profile_picture = models.ImageField(
        upload_to="Studentsphotos/%Y/%m/%d/", blank=True
    )

    def __str__(self):
        return self.firstName + " " + self.lastName


class enrolledcourses(models.Model):
    student_id = models.ForeignKey(User, on_delete=models.CASCADE)
    course_id = models.ForeignKey(courses, on_delete=models.CASCADE)
    enrolled_date = models.DateTimeField(default=datetime.now, blank=True)

    def courseid(self):
        return self.course_id

    def __str__(self):
        return self.student_id.first_name + " " +self.student_id.last_name + " is linked to " + self.course_id.name
