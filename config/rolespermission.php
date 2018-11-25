<?php 

return [
	
	"attendence"=>[
		"index",
		"create",
		"update",
		"userdata",
		"timetable_date",
		"month",
		"indexdata",
		
	],
	"backend"=>[
		"index"
	],

	"course"=>[
		"index",
		"select",
		"create",
		"store"
	],

	"batch"=>[
		"index",
		"indexdata",
		"create"
	],

	"group"=>[
		"index",
		"getBatch",
		"getGroups",
		"create",
		"getStudents"
	],
	"enrolledstudent"=>[
		"index",
		"indexdata",
		"batch",
		"courses",
		"allbatches",
		"updatepayment"
	],

	"blog"=>[
	   "index",
	   "create"
	],

	"roles"=>[
		"index",
		"indexdata",
		"getRoles",
		"getMethodsPermission",
		"getMethods",
		"changeMethodPermission"
	],
	


];