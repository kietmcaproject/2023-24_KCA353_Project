from django.contrib import admin

# Register your models here.
from students.models import students

admin.site.register(students)
