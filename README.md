# Command Line Task App


### Simple database setup using sqlite3

Enter sqlite3 with while creating your sqlite file for example. `sqlite3 db.sqlite`
```
create TABLE tasks(
    id INTEGER PRIMARY KEY,
    description TEXT NOT NULL
);
```



### Console Commands

Commands are as follows these can by found by running `./tasks list`

```
  add       Add a new task
  complete  Complete a task by its id
  help      Displays help for a command
  list      Lists commands
  show      Show all tasks
```

After adding or completing a task, the task list will be re-listed.