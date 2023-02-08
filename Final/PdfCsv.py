import tabula
import pandas as pd
df = pd.DataFrame([])
dfs = tabula.read_pdf("resultfile.pdf", pages='all',stream=True)
df = [dfs[i] for i in range(len(dfs))]
df = pd.concat(df)
df.to_csv('ok.csv',index=False)
print('ok.csv')
