from django.contrib import admin

# Register your models here.
from courses.models import courses,CourseUnits

admin.site.register(courses)
admin.site.register(CourseUnits)
