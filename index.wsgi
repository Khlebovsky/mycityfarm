import os
import sys
 
sys.path.append('/home/k/khlebovsky/mycityfarm/public_html/greenTech_project')
sys.path.append('/home/k/khlebovsky/mycityfarm/public_html/myenv/lib/python3.4/site-packages')
os.environ['DJANGO_SETTINGS_MODULE'] = 'greenTech_project.settings'
import django
django.setup()
 
from django.core.handlers import wsgi
application = wsgi.WSGIHandler()