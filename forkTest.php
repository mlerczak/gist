<?php
for ($i = 1; $i <= 10; ++$i) {
    $pid = pcntl_fork();

    if (!$pid) {
        print "Compleated, exiting...\n\n";
        exit($i);
    } else {
        echo "Store: $i\n";
        sleep(1);
    }
}

while (pcntl_waitpid(0, $status) != -1) {
    $status = pcntl_wexitstatus($status);
    echo "Child $status completed\n";
} 
