from django.contrib import admin

# Register your models here.
from counsellors.models import counsellors
from students.models import enrolledcourses

admin.site.register(counsellors)
admin.site.register(enrolledcourses)
