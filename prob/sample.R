

args <- commandArgs(TRUE)

country1 = args[1]
country2 = args[2]
country3 = args[3]
disease = args[4]


file = read.csv("DP_Data.csv",header=TRUE,stringsAsFactors = FALSE)
file = as.matrix(file)


start1 = 0
start2 = 0
start3 = 0
for(i in  1:nrow(file))
{
 
  if(file[i,1]==country1)
  {
    start1 = i
    break
  }
}
for(i in  1:nrow(file))
{
  
  if(file[i,1]==country2)
  {
    start2 = i
    break
  }
}
for(i in  1:nrow(file))
{
  
  if(file[i,1]==country3)
  {
    
    start3 = i
    break
  }
}



list1 <- c(as.numeric(file[start1:(start1+29),disease]))
list2 <- c(as.numeric(file[start2:(start2+29),disease]))
list3 <- c(as.numeric(file[start3:(start3+29),disease]))
# print(file[i,3])


#t.test(list1,list2)

CombinedGroup <- data.frame(cbind(list1,list2,list3),stringsAsFactors = FALSE)

#summary(CombinedGroup)

StackGroup <- stack(CombinedGroup)

Anova_Result <- aov(values ~ ind,data = StackGroup)


summary(Anova_Result)

