curl -X POST \
  https://f144e10537940291d73c0eef308203f1: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@local-primary-store.myshopify.com/admin/api/unstable/graphql.json \
  -H 'content-type: application/graphql' \
  -H 'x-shopify-access-token: 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' \
  -d '{
    products(first: 5, query: "(sku:MAN123) OR (sku:123SE)") {
      edges {
        node {
          id
          handle
        }
      }
      pageInfo {
        hasNextPage
      }
    }
  }'
