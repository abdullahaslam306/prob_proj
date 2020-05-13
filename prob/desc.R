
#library(pastecs)

file = read.csv("DP_Data.csv",header=TRUE,stringsAsFactors = FALSE)
file = as.matrix(file)
start1 = 1
list1 <- c(as.numeric(file[start1:(start1+29),3]))

#stat.desc(list1)

var(list1)

sd(list1)

mean(list1)
