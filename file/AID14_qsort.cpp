#include<iostream>
#include<cstdio>
using namespace std;
void qsort(int A[],int low,int high);
int main()
{
	int A[1000],n,i;
	freopen("qsort.in","r",stdin);
	
	for(i=0;i<n;i++)
		cin>>A[i];
	qsort(A,0,n-1);
	for(i=0;i<n;i++)
		cout<<A[i]<<' ';
	return 0;
}
void qsort(int A[],int low,int high)
{
	if(low>=high)return;
	int i=low,j=high,t;
	while(i<j)
	{
		while(i<j&&A[i]<A[j])
			j--;
		t=A[j];
		A[j]=A[i];
		A[i]=t;
		//i++;
		while(i<j&&A[i]<A[j])
			i++;
		t=A[j];
		A[j]=A[i];
		A[i]=t;
		//j--;
	}
	qsort(A,low,i-1);
	qsort(A,i+1,high);
}